var apiUrl = 'http://127.0.0.1:8000/api/';
import axios from 'axios';
export default{
    
    getHeader(){
        var token = localStorage.getItem('token');
        if (token === null) {
            return {};
        } else {
            return {
                Authorization: 'Bearer ' + localStorage.getItem('token')
            }
        }
    },
    get(url){
        return axios.get(apiUrl + url, { headers: this.getHeader() });
    },
    post(url, data){
        return axios.post(apiUrl + url, data, { headers: this.getHeader() });
    },
    delete(url){
        return axios.delete(apiUrl + url , {headers : this.getHeader()});
    },
    put(url,data){
        return axios.put(apiUrl + url, data, { headers: this.getHeader() });
    }


}