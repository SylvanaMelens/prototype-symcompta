import React, { useEffect, useState } from "react";
import axios from "axios";

const CustomersPage = (props) => {
  const [customers, setCustomers] = useState([]);

  useEffect(() => {
    // axios permet de faire des rq http basées sur des promesses -> qd elle sera terminée on peut travailler dessus
    axios
      .get("http://localhost:8000/api/customers")
      .then(response => response.data["hydra:member"])
      .then(data => setCustomers(data))
      .catch(error => console.log(error.response));
  }, []);

  return (
    <>
      <table className="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>CLIENT</th>
            <th>EMAIL</th>
            <th colSpan="2"></th>
          </tr>
        </thead>
        <tbody>
          {customers.map(
            customer => 
              <tr key={customer.id}>
                <td>{customer.id}</td>
                <td>
                  <a href="#">{customer.firstName} {customer.lastName}</a>
                </td>
                <td>{customer.email}</td>
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

export default CustomersPage;
