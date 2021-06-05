import axios from 'axios';
const register = async (addProjectPayload) => {
    const response = await axios.post(`https://127.0.0.1:8000/register`, addProjectPayload);

    return response.data;
}
const login = async (addProjectPayload) => {
    const response = await axios.post(`https://127.0.0.1:8000/login`, addProjectPayload);

    return response.data;
}


export  {register,login}