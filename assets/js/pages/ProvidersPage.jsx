import React, { useEffect, useState } from "react";
import axios from "axios";

const ProvidersPage = (props) => {
  const [providers, setProviders] = useState([]);

  useEffect(() => {
    // axios permet de faire des rq http basées sur des promesses -> qd elle sera terminée on peut travailler dessus
    axios
      .get("http://localhost:8000/api/providers")
      .then(response => response.data["hydra:member"])
      .then(data => setProviders(data))
      .catch(error => console.log(error.response));
  }, []);

  return (
    <>
      <table className="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>FOURNISSEUR</th>
            <th>EMAIL</th>
            <th colSpan="2"></th>
          </tr>
        </thead>
        <tbody>
          {providers.map(
            provider => 
              <tr key={provider.id}>
                <td>{provider.id}</td>
                <td>
                  <a href="#">{provider.providerFirstName} {provider.providerLastName}</a>
                </td>
                <td>{provider.providerEmail}</td>
                <td className="text-center">
                  <button className="btn btn-sm btn-secondary">VOIR</button>
                </td>
                <td className="text-center">
                  <button className="btn btn-sm btn-gris">SUPPRIMER</button>
                </td>
              </tr>
            
              )}
          
        </tbody>
      </table>
    </>
  );
};

export default ProvidersPage;
