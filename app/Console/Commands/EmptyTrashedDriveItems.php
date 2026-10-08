<?php

namespace App\Console\Commands;

use App\Models\DriveItem;
use App\Services\GoogleDriveService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Throwable;

#[Signature('drive:empty-trash')]
#[Description('Permanently delete trashed files/folders older than the configured retention period')]
class EmptyTrashedDriveItems extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(GoogleDriveService $driveService): int
    {
        $retentionDays = (int) config('drive.trash_retention_days');

        $items = DriveItem::where('is_trashed', true)
            ->where('updated_at', '<=', now()->subDays($retentionDays))
            ->get();

        if ($items->isEmpty()) {
            $this->info('No trashed items past the retention period.');

            return self::SUCCESS;
        }

        $deleted = 0;

        foreach ($items as $item) {
            try {
                if ($item->googleDriveAccount && $item->google_drive_file_id) {
                    $driveService->deleteFile($item->googleDriveAccount, $item->google_drive_file_id);
                }

                if ($item->storage_path && Storage::disk('local')->exists($item->storage_path)) {
                    Storage::disk('local')->delete($item->storage_path);
                }

                $item->delete();
                $deleted++;
            } catch (Throwable $e) {
                $this->warn("Failed deleting '{$item->name}' (#{$item->id}): {$e->getMessage()}");
            }
        }

        $this->info("Permanently deleted {$deleted} item(s) from trash (retention: {$retentionDays} days).");

        return self::SUCCESS;
    }
}
