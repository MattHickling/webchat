import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.withCredentials = true; 

import Echo from '@ably/laravel-echo';
import * as Ably from 'ably';

window.Ably = Ably;

window.Echo = new Echo({
  broadcaster: 'ably',
  authEndpoint: '/webchat/public/broadcasting/auth', 
});
