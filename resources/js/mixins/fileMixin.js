
import axios from 'axios';
const API_URL = import.meta.env.VITE_API_URL + 'file/';

export default {
    methods: {
      async getImagePath(image_name) {
        return await axios.get(API_URL + 'image/' + image_name)
        .then((res) => {
            if(res.data && res.data.image_path){
                return res.data.image_path
            }
        })
      }
    }
  };
  