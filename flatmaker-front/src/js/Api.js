import axios from 'axios';
const register = async (addProjectPayload) => {
    const response = await axios.post(`https://127.0.0.1:8000/register`, addProjectPayload
    );

    return response.data;
}
const login = async (addProjectPayload) => {
    const response = await axios.post(`https://127.0.0.1:8000/login`, addProjectPayload);

    return response.data;
}

const getHelps = async () => {
    const response = await axios.get(`https://localhost:8000/api/groups.json`);

    return response.data;
}
const setProfile = async (addProjectPayload) => {
    const response = await axios.post(`https://localhost:8000/api/user_details`, addProjectPayload);
    return response.data;
}

const setProfileDetails = async (addProjectPayload,id) => {
    const response = await axios.put(`https://localhost:8000/api/user_details/${id}`, addProjectPayload);
    return response.data;
}
const getUser = async (id) => {
    const response = await axios.get(`https://localhost:8000/api/users/${id}`);
    return response.data;
}
const postHelp = async (object) => {
    const response = await axios.post(`https://localhost:8000/help`,object);
    return response.data;
}

export  {register,login,getHelps, setProfile,setProfileDetails, getUser, postHelp}