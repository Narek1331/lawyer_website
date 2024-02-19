import PostService from '../../services/post.service';

const post = {
    namespaced: true,
    // state: initialState,
    state () {
        return {
            posts: [],
            post: {},
            edit_status: false
        }
    },
    getters: {
        getPosts (state) {
          return state.posts;
        },
        getPost (state) {
            return state.post;
        },
        getEditStatus (state) {
            return state.edit_status;
        }
    },
    actions: {
        get({ commit }){
            return PostService.get().then(
                response => {
                    commit('ADD_POST', response.data.data);
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        },
        getById({ commit },id){
            return PostService.getById(id).then(
                response => {
                    commit('ADD_SINGLE_POST', response.data.data);
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        },
        destroy({ commit },id){
            return PostService.destroy(id).then(
                response => {
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        },
        edit({ commit },data){
            return PostService.edit(data.id,data.name,data.description).then(
                response => {
                    if(response.data && response.data.status){
                        commit('ADD_EDIT_STATUS', true);
                    }
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        },
        store({ commit },data){
            return PostService.store(data.name,data.description).then(
                response => {
                    if(response.data && response.data.status){
                    }
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        }
    },
    mutations: {
        ADD_POST(state, posts) {
            state.posts = posts;
        },
        ADD_SINGLE_POST(state, post) {
            state.post = post;
        },
        ADD_EDIT_STATUS(state, status = true) {
            state.edit_status = status;
        }
    }
  };

  export default post;