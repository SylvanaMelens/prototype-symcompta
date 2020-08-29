import React, { useState } from "react";
import axiosAPI from "../services/axiosAPI";

const LoginPage = ({ onLogin, history }) => {
  const [credentials, setCredentials] = useState({
    username: "",
    password: "",
  });

  const [error, setError] = useState("");

  const handleChange = ({ currentTarget }) => {
    const { value, name } = currentTarget;
    setCredentials({ ...credentials, [name]: value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      await axiosAPI.authenticate(credentials);
      setError("");
      onLogin(true);
      history.replace("/clients");
    } catch (error) {
      console.log(error.response);
      setError("Oups email invalide...");
    }
  };

  return (
    <>
      <form
        onSubmit={handleSubmit}
        className="center-block"
        id="form"
        action=""
      >
        <h1 id="connexion">Connexion</h1>
        <div className="form-group">
          <label htmlFor="username">Entrez votre email</label>
          <input
            className={"form-control" + (error && " is-invalid")}
            value={credentials.username}
            onChange={handleChange}
            type="email"
            placeholder="example@example.com"
            name="username"
            id="username"
          />
          {error && <p className="invalid-feedback">{error}</p>}
        </div>
        <div className="form-group">
          <label htmlFor="password">Entrez votre mot de passe</label>
          <input
            className="form-control"
            value={credentials.password}
            onChange={handleChange}
            type="password"
            placeholder="mot de passe"
            name="password"
            id="password"
          />
        </div>

        <div id="div-btn-connexion" className="form-group">
          <button type="submit" className="btn btn-secondary col-md-6">
            CONNEXION
          </button>
        </div>
      </form>
    </>
  );
};

export default LoginPage;
