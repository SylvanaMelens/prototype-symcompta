import axios from "axios";

const findAll = (intervenant) => {
    return axios
    .get(`http://localhost:8000/api/${intervenant}/`)
    .then((response) => response.data["hydra:member"])
}

const deleteIntervenant = (id, intervenant) => {
    return axios
    .delete(`http://localhost:8000/api/${intervenant}/` + id)
}

export default {
    findAll,
    delete : deleteIntervenant
}