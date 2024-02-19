import { createStore } from 'vuex';
import auth from './modules/auth';
import message from './modules/message';
import post from './modules/post';

const store = createStore({
  modules: {
    auth,
    message,
    post
  }
});

export default store;
