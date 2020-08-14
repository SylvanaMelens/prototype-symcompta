import React, { useEffect, useState } from "react";
import axios from "axios";
import Pagination from "../components/Pagination";

const CustomersPage = (props) => {
  const [customers, setCustomers] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);

  useEffect(() => {
    // axios permet de faire des rq http basées sur des promesses -> qd elle sera terminée on peut travailler dessus
    axios
      .get("http://localhost:8000/api/customers/")
      .then((response) => response.data["hydra:member"])
      .then((data) => setCustomers(data))
      .catch((error) => console.log(error.response));
  }, []);

  const handleDelete = (id) => {
    //console.log(id);
    const originalCustomers = [...customers];
    setCustomers(customers.filter((customer) => customer.id !== id));
    axios
      .delete("http://localhost:8000/api/customers/" + id)
      .then((response) => console.log("ok"))
      .catch((error) => {
        setCustomers(originalCustomers);
        console.log(error.response);
      });
  };

  const handleChangePage = (page) => {
    setCurrentPage(page);
  };

  const paginated = Pagination.getData(customers, currentPage);

  return (
    <>
      <table className="table table-hover">
        <thead className="thead">
          <tr>
            <th>ID</th>
            <th>CLIENT</th>
            <th>EMAIL</th>
            <th className="form-group" colSpan="2">
              <input
                type="text"
                placeholder="Rechercher..."
                className="form-control"
              />
            </th>
          </tr>
        </thead>
        <tbody>
          {paginated.map((customer) => (
            <tr key={customer.id}>
              <td>{customer.id}</td>
              <td>
                <a href="#">
                  {customer.firstName} {customer.lastName}
                </a>
              </td>
              <td>{customer.email}</td>
              <td className="text-center">
                <button className="btn btn-sm btn-secondary">VOIR</button>
              </td>
              <td className="text-center">
                <button
                  onClick={() => handleDelete(customer.id)}
                  disabled={customer.invoiceCustomers.length > 0}
                  className="btn btn-sm btn-gris"
                >
                  SUPPRIMER
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {customers.length > 7 && (
        <Pagination
          pageName={customers}
          currentPage={currentPage}
          handleChangePage={handleChangePage}
        />
      )}
    </>
  );
};

export default CustomersPage;
