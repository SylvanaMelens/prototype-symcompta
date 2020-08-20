import axios from "axios";

const findAll = (item) => {
    return axios
    .get(`http://localhost:8000/api/${item}/`)
    .then((response) => response.data["hydra:member"])
}

const deleteIntervenant = (id, item) => {
    return axios
    .delete(`http://localhost:8000/api/${item}/${id}`)
}

const authenticate = credentials => {
    return axios
        .post("http://localhost:8000/api/login_check", credentials)
        .then((response) => response.data.token)
        .then(token => {
            window.localStorage.setItem("authToken", token);
            axios.defaults.headers["Authorization"] = "Bearer " + token;
        return true
        });
}

export default {
    findAll,
    delete : deleteIntervenant,
    authenticate
}