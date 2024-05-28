
// gcmanalyticsstorage
tarteaucitron.services.gcmanalyticsstorage = {
    "key": "gcmanalyticsstorage",
    "type": "google",
    "name": "Analytics",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": [],
    "js": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                analytics_storage: 'granted'
            });
        }
    },
    "fallback": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                analytics_storage: 'denied'
            });
        }
    }
};

// gcmadstorage
tarteaucitron.services.gcmadstorage = {
    "key": "gcmadstorage",
    "type": "google",
    "name": "Advertising",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": [],
    "js": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                ad_storage: 'granted'
            });
        }
    },
    "fallback": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                ad_storage: 'denied'
            });
        }
    }
};

// gcmadsuserdata
tarteaucitron.services.gcmadsuserdata = {
    "key": "gcmadsuserdata",
    "type": "google",
    "name": "Personalized Advertising",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": [],
    "js": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                ad_user_data: 'granted',
                ad_personalization: 'granted'
            });
        }
    },
    "fallback": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                ad_user_data: 'denied',
                ad_personalization: 'denied'
            });
        }
    }
};

// gcmpersonalization
tarteaucitron.services.gcmpersonalization = {
    "key": "gcmpersonalization",
    "type": "google",
    "name": "Personalization",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": [],
    "js": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                personalization_storage: 'granted'
            });
        }
    },
    "fallback": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                personalization_storage: 'denied'
            });
        }
    }
};

// gcmfunctionality
tarteaucitron.services.gcmfunctionality = {
    "key": "gcmfunctionality",
    "type": "google",
    "name": "Functionality",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": [],
    "js": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                functionality_storage: 'granted'
            });
        }
    },
    "fallback": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                functionality_storage: 'denied'
            });
        }
    }
};

// gcmsecurity
tarteaucitron.services.gcmsecurity = {
    "key": "gcmsecurity",
    "type": "google",
    "name": "Security",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": [],
    "js": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                security_storage: 'granted'
            });
        }
    },
    "fallback": function () {
        "use strict";

        if (tarteaucitron.parameters.googleConsentMode === true) {
            window.tac_gtag('consent', 'update', {
                security_storage: 'denied'
            });
        }
    }
};


// google ads
tarteaucitron.services.googleads = {
    "key": "googleads",
    "type": "ads",
    "name": "Google Ads",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": (function () {
        var googleIdentifier = tarteaucitron.user.googleadsId,
            tagUaCookie = '_gat_gtag_' + googleIdentifier,
            tagGCookie = '_ga_' + googleIdentifier;

        tagUaCookie = tagUaCookie.replace(/-/g, '_');
        tagGCookie = tagGCookie.replace(/G-/g, '');

        return ['_ga', '_gat', '_gid', '__utma', '__utmb', '__utmc', '__utmt', '__utmz', tagUaCookie, tagGCookie, '_gcl_au'];
    })(),
    "js": function () {
        "use strict";
        window.dataLayer = window.dataLayer || [];
        tarteaucitron.addScript('https://www.googletagmanager.com/gtag/js?id=' + tarteaucitron.user.googleadsId, '', function () {
            window.gtag = function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            var additional_config_info = (timeExpire !== undefined) ? {'anonymize_ip': true, 'cookie_expires': timeExpire / 1000} : {'anonymize_ip': true};

            gtag('config', tarteaucitron.user.googleadsId, additional_config_info);

            if (typeof tarteaucitron.user.googleadsMore === 'function') {
                tarteaucitron.user.googleadsMore();
            }
        });
    },
    "fallback": function () {
        if (tarteaucitron.parameters.googleConsentMode === true) {
            this.js();
        }
    }
};

// google analytics
tarteaucitron.services.gtag = {
    "key": "gtag",
    "type": "analytic",
    "name": "Google Analytics (GA4)",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": (function () {
        var googleIdentifier = tarteaucitron.user.gtagUa,
            tagUaCookie = '_gat_gtag_' + googleIdentifier,
            tagGCookie = '_ga_' + googleIdentifier;

        tagUaCookie = tagUaCookie.replace(/-/g, '_');
        tagGCookie = tagGCookie.replace(/G-/g, '');

        return ['_ga', '_gat', '_gid', '__utma', '__utmb', '__utmc', '__utmt', '__utmz', tagUaCookie, tagGCookie, '_gcl_au'];
    })(),
    "js": function () {
        "use strict";
        window.dataLayer = window.dataLayer || [];
        tarteaucitron.addScript('https://www.googletagmanager.com/gtag/js?id=' + tarteaucitron.user.gtagUa, '', function () {
            window.gtag = function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            var additional_config_info = (timeExpire !== undefined) ? {'anonymize_ip': true, 'cookie_expires': timeExpire / 1000} : {'anonymize_ip': true};

            if (tarteaucitron.user.gtagCrossdomain) {
                /**
                 * https://support.google.com/analytics/answer/7476333?hl=en
                 * https://developers.google.com/analytics/devguides/collection/gtagjs/cross-domain
                 */
                gtag('config', tarteaucitron.user.gtagUa, additional_config_info, { linker: { domains: tarteaucitron.user.gtagCrossdomain, } });
            } else {
                gtag('config', tarteaucitron.user.gtagUa, additional_config_info);
            }

            if (typeof tarteaucitron.user.gtagMore === 'function') {
                tarteaucitron.user.gtagMore();
            }
        });
    },
    "fallback": function () {
        if (tarteaucitron.parameters.googleConsentMode === true) {
            this.js();
        }
    }
};

// google tag manager
tarteaucitron.services.googletagmanager = {
    "key": "googletagmanager",
    "type": "api",
    "name": "Google Tag Manager",
    "uri": "https://policies.google.com/privacy",
    "needConsent": true,
    "cookies": ['_ga', '_gat', '__utma', '__utmb', '__utmc', '__utmt', '__utmz', '__gads', '_drt_', 'FLC', 'exchange_uid', 'id', 'fc', 'rrs', 'rds', 'rv', 'uid', 'UIDR', 'UID', 'clid', 'ipinfo', 'acs'],
    "js": function () {
        "use strict";
        if (tarteaucitron.user.googletagmanagerId === undefined) {
            return;
        }
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        tarteaucitron.addScript('https://www.googletagmanager.com/gtm.js?id=' + tarteaucitron.user.googletagmanagerId);
    }
};

// facebook pixel
tarteaucitron.services.facebookpixel = {
    "key": "facebookpixel",
    "type": "ads",
    "name": "Facebook Pixel",
    "uri": "https://www.facebook.com/policy.php",
    "needConsent": true,
    "cookies": ['datr', 'fr', 'reg_ext_ref', 'reg_fb_gate', 'reg_fb_ref', 'sb', 'wd', 'x-src', '_fbp'],
    "js": function () {
        "use strict";
        var n;
        if (window.fbq) return;
        n = window.fbq = function () { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments) };
        if (!window._fbq) window._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        tarteaucitron.addScript('https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', tarteaucitron.user.facebookpixelId);
        fbq('track', 'PageView');

        if (typeof tarteaucitron.user.facebookpixelMore === 'function') {
            tarteaucitron.user.facebookpixelMore();
        }
    }
};


// bing ads universal event tracking
tarteaucitron.services.bingads = {
    'key': 'bingads',
    'type': 'ads',
    'name': 'Bing Ads Universal Event Tracking',
    'uri': 'https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads',
    'needConsent': true,
    'cookies': ['_uetmsclkid', '_uetvid', '_uetsid'],
    'js': function () {
        'use strict';
        //var u = tarteaucitron.user.bingadsTag || 'uetq';
        window.uetq = window.uetq || [];

        tarteaucitron.addScript('https://bat.bing.com/bat.js', '', function () {
            var bingadsCreate = { ti: tarteaucitron.user.bingadsID };

            if ('bingadsStoreCookies' in tarteaucitron.user) {
                bingadsCreate['storeConvTrackCookies'] = tarteaucitron.user.bingadsStoreCookies;
            }

            bingadsCreate.q = window.uetq;
            window.uetq = new UET(bingadsCreate);
            window.uetq.push('pageLoad');

            if (typeof tarteaucitron.user.bingadsMore === 'function') {
                tarteaucitron.user.bingadsMore();
            }
        });
    }
};