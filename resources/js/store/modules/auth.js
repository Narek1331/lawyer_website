import AuthService from '../../services/auth.service';

const user = localStorage.getItem('lawyer_web_token');
const initialState = user
  ? { status: { loggedIn: true }, user }
  : { status: { loggedIn: false }, user: null };

const auth = {
    namespaced: true,
    state () {
      return {
          ...initialState,
          chnagedPassword:false,
          addedAdmin:false,
          errorMessages: {}
      }
    },
    getters:{
      chnagedPassword(state){
        return state.chnagedPassword;
      },
      addedAdmin(state){
        return state.addedAdmin;
      },
      errorMessages(state){
        return state.errorMessages;
      }
    },
    actions: {
      login({ commit }, user) {
        return AuthService.login(user).then(
          user => {
            commit('loginSuccess', user);
            return Promise.resolve(user);
          },
          error => {
            commit('loginFailure');
            return Promise.reject(error);
          }
        );
      },
      logout({ commit }) {
        AuthService.logout();
        commit('logout');
      },
      register({ commit }, user) {
        return AuthService.register(user).then(
          response => {
            commit('registerSuccess');
            return Promise.resolve(response.data);
          },
          error => {
            commit('registerFailure');
            return Promise.reject(error);
          }
        );
      },
      changePassword({ commit },data) {
        commit('chnagedPassword',false);
        commit('setErrorMessages',{});

        return AuthService.changePassword(data).then((res)=>{
          if(res){
            commit('chnagedPassword',true);
          }
        }).catch((er)=>{
          commit('setErrorMessages',er.response.data);

        })
      },
      addAdminUser({ commit },data) {
        commit('addedAdmin',false);
        commit('setErrorMessages',{});


        return AuthService.addAdminUser(data).then((res)=>{
          if(res){
            commit('addedAdmin',true);
          }
        }).catch((er)=>{
          commit('setErrorMessages',er.response.data);

        })
      },
    },
    mutations: {
      chnagedPassword(state, status = true){
        state.chnagedPassword = status;
      },
      addedAdmin(state, status = true){
        state.addedAdmin = status;
      },
      loginSuccess(state, user) {
        state.status.loggedIn = true;
        state.user = user;
      },
      loginFailure(state) {
        state.status.loggedIn = false;
        state.user = null;
      },
      logout(state) {
        state.status.loggedIn = false;
        state.user = null;
      },
      registerSuccess(state) {
        state.status.loggedIn = false;
      },
      registerFailure(state) {
        state.status.loggedIn = false;
      },
      setErrorMessages(state, messages) {
        state.errorMessages = messages;
      }
    }
  };

  export default auth;