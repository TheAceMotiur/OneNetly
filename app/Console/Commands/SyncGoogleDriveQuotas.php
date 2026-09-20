<?php

namespace App\Console\Commands;

use App\Models\GoogleDriveAccount;
use App\Services\GoogleDriveService;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Throwable;

#[Signature('drive:sync-quotas')]
#[Description('Sync storage quota usage from Google for every active Drive account')]
class SyncGoogleDriveQuotas extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(GoogleDriveService $driveService): int
    {
        $accounts = GoogleDriveAccount::where('is_active', true)->get();

        if ($accounts->isEmpty()) {
            $this->info('No active Google Drive accounts to sync.');

            return self::SUCCESS;
        }

        $synced = 0;
        $failed = 0;

        foreach ($accounts as $account) {
            try {
                $driveService->syncAccountQuota($account);
                $synced++;
            } catch (Throwable $e) {
                $failed++;
                $this->warn("Failed syncing '{$account->name}': {$e->getMessage()}");
            }
        }

        $this->info("Synced storage quota for {$synced} account(s)".($failed > 0 ? ", {$failed} failed" : '').'.');

        return self::SUCCESS;
    }
}
