import axios from 'axios';
import authHeader from './auth-header';

const API_URL = import.meta.env.VITE_API_URL + 'post';

class PostService {

  get() {
    return axios.get(API_URL,{ headers: authHeader() });
  }

  getById(id) {
    return axios.get(API_URL + '/' + id,{ headers: authHeader() });
  }

  edit(id,name,description) {
    return axios.put(API_URL + '/' + id,{name:name,description,description},{ headers: authHeader() });
  }
  
  store(name,description) {
    return axios.post(API_URL,{name:name,description,description},{ headers: authHeader() });
  }
  
  destroy(id) {
    return axios.delete(API_URL + '/' + id,{ headers: authHeader() });
  }
}

export default new PostService();