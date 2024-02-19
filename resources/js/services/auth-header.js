export default function authHeader() {
    let userToken = localStorage.getItem('lawyer_web_token');
  
    if (userToken) {
      return { Authorization: 'Bearer ' + userToken };
    } else {
      return {};
    }
  }