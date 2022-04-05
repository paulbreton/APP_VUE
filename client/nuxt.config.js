export default {
    // Global page headers: https://go.nuxtjs.dev/config-head
    head: {
        title: process.env.npm_package_name || '',
        titleTemplate: 'Association',
        htmlAttrs: {
            lang: 'fr'
        },
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: '' }
        ],
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
        ],
        
    },

    loading: false,

    // Global CSS: https://go.nuxtjs.dev/config-css
    css: [
        'element-ui/lib/theme-chalk/index.css',
        '~assets/css/style.scss',
        '@fortawesome/fontawesome-svg-core/styles.css',
    ],

    // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
    plugins: [
        '@/plugins/element-ui',
        '@/plugins/fontawesome.js'
    ],

    // Auto import components: https://go.nuxtjs.dev/config-components
    components: true,

    // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
    buildModules: [
        // https://go.nuxtjs.dev/tailwindcss
        '@nuxtjs/tailwindcss',
        '@nuxtjs/composition-api/module',
        '@nuxtjs/fontawesome',
    ],

    // Modules: https://go.nuxtjs.dev/config-modules
    modules: [
        // https://go.nuxtjs.dev/axios
        '@nuxtjs/axios',
        '@nuxtjs/auth-next',
        '@nuxtjs/i18n',
        '@nuxtjs/dayjs',
        // '@nuxtjs/composition-api/',
        [
            'nuxt-fontawesome', {
              imports: [
               {
                 set: '@fortawesome/free-solid-svg-icons',
                 icons: ['fas']
               },
               {
                 set:'@fortawesome/free-brands-svg-icons',
                 icons: ['fab']
               }
             ]
            }
        ]

    ],

    /**
     * 
     */

    // Axios module configuration: https://go.nuxtjs.dev/config-axios
    axios: {
        baseURL: 'http://localhost:8000/',
        credentials: true
    },

    auth: {
        strategies: {
            'laravelSanctum': {
                provider: 'laravel/sanctum',
                url: 'http://localhost:8000',
                endpoints: {
                    login: {
                        url: '/login'
                    },
                    logout: {
                        url: '/logout'
                    },
                    user: {
                        url: '/api/user'
                    },
                },
                user: {
                    property: false
                }
            },
        },
        redirect: {
            login: '/auth/login',
            logout: '/',
            home: '/',
        }
    },

    // Optional
    dayjs: {
        locales: ['fr'],
        defaultLocale: 'fr',
        defaultTimeZone: 'Europe/Paris',
        plugins: [
        'utc', // import 'dayjs/plugin/utc'
        'timezone', // import 'dayjs/plugin/timezone'
        'isToday',
        ] // Your Day.js plugin
    },

    // Build Configuration: https://go.nuxtjs.dev/config-build
    build: {},
}
