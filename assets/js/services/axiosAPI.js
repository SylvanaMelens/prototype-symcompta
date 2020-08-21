import axios from "axios";
import jwtDecode from "jwt-decode";

const findAll = (item) => {
  return axios
    .get(`http://localhost:8000/api/${item}/`)
    .then((response) => response.data["hydra:member"]);
};

const deleteIntervenant = (id, item) => {
  return axios.delete(`http://localhost:8000/api/${item}/${id}`);
};

const logout = () => {
  window.localStorage.removeItem("authToken");
  delete axios.defaults.headers["Authorization"];
};

const authenticate = (credentials) => {
  return axios
    .post("http://localhost:8000/api/login_check", credentials)
    .then((response) => response.data.token)
    .then((token) => {
      window.localStorage.setItem("authToken", token);
      axios.defaults.headers["Authorization"] = "Bearer " + token;
      return true;
    });
};

const setup = () => {
  const token = window.localStorage.getItem("authToken");

  if (token) {
    const jwtData = jwtDecode(token);
    if (jwtData.exp * 1000 > new Date().getTime()) {
      axios.defaults.headers["Authorization"] = "Bearer " + token;
      console.log("connexion établie avec axios")
    } else {
      logout();
    }
  } else {
    logout();
  }
};

export default {
  findAll,
  delete: deleteIntervenant,
  authenticate,
  logout,
  setup,
};
