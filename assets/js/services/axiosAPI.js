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

export default {
    findAll,
    delete : deleteIntervenant
}