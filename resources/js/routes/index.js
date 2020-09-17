import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

import NewsFeed      from '../components/NewsFeed'
import Timeline      from '../components/Timeline'
import Profile       from '../components/includes/Profile'
import UserFriends   from '../components/UserFriends'
import UserPhotos    from '../components/UserPhotos.vue'
import UserVideos from "../components/UserVideos";
import UserSettings from "../components/UserSettings";
import UserAbout from "../components/UserAbout.vue";

// import pageNotFound       from '../components/frontend/404.vue'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: "/newsfeed",
            name: "NewsFeed",
            components: {
                'default': NewsFeed,
            },
        },
        {
            path: "/:username",
            name: "Timeline",
            components: {
                'default': Timeline,
                'profile': Profile,
            },
        },
        {
            path: "/:username/friends",
            name: "UserFriends",
            components: {
                'default': UserFriends,
                'profile': Profile,
            },
        },
        {
            path: "/:username/photos",
            name: "UserPhotos",
            components: {
                'default': UserPhotos,
                'profile': Profile,
            },
        },
        {
            path: "/:username/videos",
            name: "UserVideos",
            components: {
                'default': UserVideos,
                'profile': Profile,
            },
        },

        {
            path: "/:username/settings",
            name: "UserSettings",
            components: {
                'default': UserSettings,
                'profile': Profile,
            },
        },

        {
            path: "/:username/about",
            name: "UserAbout",
            components: {
                'default': UserAbout,
                'profile': Profile,
            },
        }

        // {path: "*",                         component: pageNotFound, name: 'pageNotFound'}
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});
