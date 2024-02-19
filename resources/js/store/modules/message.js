import MessageService from '../../services/message.service';

const message = {
    namespaced: true,
    // state: initialState,
    state () {
        return {
            messages: [],
            message: {}
        }
    },
    getters: {
        getMessages (state) {
          return state.messages;
        },
        getMessage (state) {
            return state.message;
          }
    },
    actions: {
        get({ commit }){
            return MessageService.get().then(
                response => {
                    commit('ADD_MESSAGE', response.data.data);
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        },
        getById({ commit },id){
            return MessageService.getById(id).then(
                response => {
                    commit('ADD_SINGLE_MESSAGE', response.data.data);
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        },
        answer({ commit },data){
            return MessageService.answer(data.id,data.message).then(
                response => {
                    commit('UPDATE_SINGLE_MESSAGE', response.data.data);
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        },
        store({ commit },data){
            return MessageService.store(data).then(
                response => {
                    return Promise.resolve(response.data.data);
                },
                error => {
                  return Promise.reject(error);
                }
              );
        }
    },
    mutations: {
        ADD_MESSAGE(state, messages) {
            state.messages = messages;
        },
        ADD_SINGLE_MESSAGE(state, message) {
            state.message = message;
        },
        UPDATE_SINGLE_MESSAGE(state, message) {
            state.message = message;
        }
    }
  };

  export default message;