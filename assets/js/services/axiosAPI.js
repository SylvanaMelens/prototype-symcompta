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

const setAxiosToken = (token) => {
  return (axios.defaults.headers["Authorization"] = "Bearer " + token);
};

const authenticate = (credentials) => {
  return axios
    .post("http://localhost:8000/api/login_check", credentials)
    .then((response) => response.data.token)
    .then((token) => {
      window.localStorage.setItem("authToken", token);
      setAxiosToken(token);
      return true;
    });
};

const setup = () => {
  const token = window.localStorage.getItem("authToken");

  if (token) {
    const jwtData = jwtDecode(token);
    if (jwtData.exp * 1000 > new Date().getTime()) {
      setAxiosToken(token);
    }
  }
};

const isAuthenticated = () => {
  const token = window.localStorage.getItem("authToken");
  if (token) {
    const jwtData = jwtDecode(token);
    if (jwtData.exp * 1000 > new Date().getTime()) {
      return true;
    }
    return false;
  }
  return false;
};


export default {
  findAll,
  delete: deleteIntervenant,
  authenticate,
  logout,
  setup,
  isAuthenticated,
};
