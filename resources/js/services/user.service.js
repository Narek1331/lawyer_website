import axios from 'axios';
import authHeader from './auth-header';

const API_URL = 'http://localhost/api/auth/';

class UserService {

  getMe() {
    return axios.get(API_URL);
  }
}

export default new UserService();