import React from "react";

const Navbar = () => {
  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
      <a className="navbar-brand" href="#">
        SYMCOMPTA
      </a>
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
            <a className="nav-link" href="#">
              Clients <span className="sr-only">(current)</span>
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#">
            Factures clients
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#">
              Fournisseurs
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#">
              Factures fournisseurs
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#">
              Déclaration TVA
            </a>
          </li>
        </ul>
        <ul className="navbar-nav ml-auto">
          <li className="nav-item">
            <a href="" className="nav-link">
              Inscription
            </a>
          </li>
          <li className="nav-item">
            <a href="#" className="btn btn-secondary">
              Connexion
            </a>
          </li>
          <li className="nav-item"><a href="#" className="btn btn-secondary">Déconnexion</a></li>
        </ul>
      </div>
    </nav>
  );
};

export default Navbar;
