import axios from 'axios';
import authHeader from './auth-header';

const API_URL = import.meta.env.VITE_API_URL + 'message';

class MessageService {

  get() {
    return axios.get(API_URL,{ headers: authHeader() });
  }

  getById(id) {
    return axios.get(API_URL + '/' + id,{ headers: authHeader() });
  }
  
  answer(id,message) {
    return axios.post(API_URL + '/answer/' + id,{message:message},{ headers: authHeader() });
  }
  
  store(data) {
    return axios.post(API_URL,data,{ headers: authHeader() });
  }
}

export default new MessageService();