import React from "react";
import axiosAPI from "../services/axiosAPI";
import { NavLink } from "react-router-dom";

const Navbar = () => {
  const handleLogout = () => {
    axiosAPI.logout();
  };

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
      <NavLink className="navbar-brand" to="/">
        SYMCOMPTA
      </NavLink>
      <button
        className="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarColor01"
        aria-controls="navbarColor01"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span className="navbar-toggler-icon"></span>
      </button>

      <div className="collapse navbar-collapse" id="navbarColor01">
        <ul className="navbar-nav mr-auto">
          <li className="nav-item active">
            <NavLink className="nav-link" to="/clients">
              Clients <span className="sr-only">(current)</span>
            </NavLink>
          </li>
          <li className="nav-item">
            <NavLink className="nav-link" to="/factures-clients">
              Factures clients
            </NavLink>
          </li>
          <li className="nav-item">
            <NavLink className="nav-link" to="/fournisseurs">
              Fournisseurs
            </NavLink>
          </li>
          <li className="nav-item">
            <NavLink className="nav-link" to="/factures-fournisseurs">
              Factures fournisseurs
            </NavLink>
          </li>
          <li className="nav-item">
            <NavLink className="nav-link" to="/declaration-tva">
              Déclaration TVA
            </NavLink>
          </li>
        </ul>
        <ul className="navbar-nav ml-auto">
          <li className="nav-item">
            <NavLink to="/inscription" className="nav-link">
              Inscription
            </NavLink>
          </li>
          <li className="nav-item">
            <NavLink to="/login" className="btn btn-secondary">
              Connexion
            </NavLink>
          </li>
          <li className="nav-item">
            <button onClick={handleLogout} className="btn btn-secondary">
              Déconnexion
            </button>
          </li>
        </ul>
      </div>
    </nav>
  );
};

export default Navbar;
