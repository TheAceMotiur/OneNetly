/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./app.vue",
  ],
  theme: {
    extend: {
      screens: {
        'xs': '375px',
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1280px',
        '2xl': '1536px',
        '3xl': '1800px',
        'mobile': {'max': '767px'},
        'tablet': {'min': '768px', 'max': '1023px'},
        'desktop': {'min': '1024px'},
        'touch': {'raw': '(hover: none)'},
        'mouse': {'raw': '(hover: hover)'},
        'retina': {'raw': '(-webkit-min-device-pixel-ratio: 2)'},
        'landscape': {'raw': '(orientation: landscape)'},
        'portrait': {'raw': '(orientation: portrait)'},
      },
      fontSize: {
        'fluid-xs': 'clamp(0.75rem, 2vw, 0.875rem)',
        'fluid-sm': 'clamp(0.875rem, 2.5vw, 1rem)',
        'fluid-base': 'clamp(1rem, 3vw, 1.125rem)',
        'fluid-lg': 'clamp(1.125rem, 3.5vw, 1.25rem)',
        'fluid-xl': 'clamp(1.25rem, 4vw, 1.5rem)',
        'fluid-2xl': 'clamp(1.5rem, 5vw, 2rem)',
        'fluid-3xl': 'clamp(1.875rem, 6vw, 2.5rem)',
        'fluid-4xl': 'clamp(2.25rem, 7vw, 3rem)',
        'fluid-5xl': 'clamp(3rem, 8vw, 4rem)',
        'fluid-6xl': 'clamp(3.75rem, 9vw, 5rem)',
        'fluid-7xl': 'clamp(4.5rem, 10vw, 6rem)',
        'fluid-8xl': 'clamp(6rem, 12vw, 8rem)',
        'fluid-9xl': 'clamp(8rem, 15vw, 10rem)',
      },
      spacing: {
        'fluid-1': 'clamp(0.25rem, 1vw, 0.5rem)',
        'fluid-2': 'clamp(0.5rem, 2vw, 1rem)',
        'fluid-3': 'clamp(0.75rem, 3vw, 1.5rem)',
        'fluid-4': 'clamp(1rem, 4vw, 2rem)',
        'fluid-5': 'clamp(1.25rem, 5vw, 2.5rem)',
        'fluid-6': 'clamp(1.5rem, 6vw, 3rem)',
      },
      animation: {
        'fade-in-up': 'fadeInUp 0.8s ease-out',
        'bounce-gentle': 'bounceGentle 2s ease-in-out infinite',
        'float': 'float 6s ease-in-out infinite',
        'gradient': 'gradient 15s ease infinite',
      },
      keyframes: {
        fadeInUp: {
          '0%': { opacity: '0', transform: 'translateY(30px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
        bounceGentle: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-20px)' },
        },
        gradient: {
          '0%, 100%': { backgroundPosition: '0% 50%' },
          '50%': { backgroundPosition: '100% 50%' },
        },
      },
      boxShadow: {
        'premium-lg': '0 20px 60px -15px rgba(0, 0, 0, 0.3), 0 0 1px rgba(0, 0, 0, 0.1)',
      },
    },
  },
  plugins: [],
}
