import React, { useState } from "react";
import axiosAPI from "../services/axiosAPI";
import Field from "../components/forms/Field";

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
      setError("Oups email et/ou mot de passe invalide(s)...");
    }
  };

  return (
    <>
      <form
        onSubmit={handleSubmit}
        className="center-block form-group col-sm-6"
        id="form"
        action=""
      >
        <h1 id="connexion" className="text-center form-group col-sm-4 pb2">
          Connexion
        </h1>
        <Field
          label="Entrez votre email"
          value={credentials.username}
          onChange={handleChange}
          type="email"
          placeholder="example@example.com"
          name="username"
          error=""
        />
        <Field
          label="Entrez votre mot de passe"
          value={credentials.password}
          onChange={handleChange}
          type="password"
          placeholder="mot de passe"
          name="password"
          error={error}
        />
        <div id="div-btn-connexion" className="form-group text-center">
          <button type="submit" className="btn btn-secondary col-sm-6">
            CONNEXION
          </button>
        </div>
      </form>
    </>
  );
};

export default LoginPage;
