import React, { useState } from "react";

const LoginPage = (props) => {

    const [credentials, setCredentials] = useState({
        username: "",
        password: ""
    })

    const handleChange = (e) => {
        const value = e.currentTarget.value;
        const name = e.currentTarget.name;
        setCredentials({...credentials, [name]: value})
    }

    const handleSubmit = e => {
        e.preventDefault();
        console.log(credentials)

    }

    return (
    <>
        <form onSubmit={handleSubmit} className="center-block" id="form" action="">
            <h1 id="connexion">Connexion</h1>
            <div className="form-group">
            <label htmlFor="username">Entrez votre email</label>
            <input
                value={ credentials.username }
                onChange={ handleChange }
                type="email"
                className="form-control"
                placeholder="example@example.com"
                name="username"
                id="username"
            />
            </div>
            <div className="form-group">
            <label htmlFor="password">Entrez votre mot de passe</label>
            <input
                value={ credentials.password }
                onChange={ handleChange }
                type="password"
                className="form-control"
                placeholder="mot de passe"
                name="password"
                id="password"
            />
            </div>
            <div id="div-btn-connexion" className="form-group" >
               <button type="submit" className="btn btn-secondary col-md-6">CONNEXION</button>
            </div>
        </form>
    </>
  );
};

export default LoginPage;
