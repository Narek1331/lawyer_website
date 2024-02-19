import axios from 'axios';
import authHeader from './auth-header';

const API_URL = import.meta.env.VITE_API_URL + 'auth/';

class AuthService {

  changePassword(data){
    return axios.post(API_URL + 'change-password',data,{ headers: authHeader() })
    .then(response => {
      if (response.data.token) {
        localStorage.removeItem('lawyer_web_token');
        localStorage.setItem('lawyer_web_token', response.data.token);
      }

      return response.data;
    });
  }
  
  addAdminUser(data){
    return axios.post(API_URL + 'signup',data,{ headers: authHeader() });
  }

  login(user) {
    return axios
      .post(API_URL + 'signin', {
        email: user.email,
        password: user.password
      })
      .then(response => {
        if (response.data.token) {
          localStorage.setItem('lawyer_web_token', response.data.token);
        }

        return response.data;
      });
  }

  logout() {
    localStorage.removeItem('user');
  }
}

export default new AuthService();