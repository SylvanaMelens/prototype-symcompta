import React, { useEffect, useState } from "react";
import Pagination from "../components/Pagination";
import Thead from "../components/Thead"
import axiosAPI from "../services/axiosAPI.js";

const CustomersPage = (props) => {
  const [customers, setCustomers] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [search, setSearch] = useState("");

  const fetchIntervenant = async () => {
    try {
      const data = await axiosAPI.findAll("customers");
      setCustomers(data);
    } catch (error) {
      console.log(error.response);
    }
  };

  useEffect(() => { fetchIntervenant(), [] })

  const handleDelete = async (id) => {
    const originalCustomers = [...customers];
    setCustomers(customers.filter((customer) => customer.id !== id));

    try {
      await axiosAPI.delete(id, "customers");
    } catch (error) {
      setCustomers(originalCustomers);
      console.log(error.response);
    }
  };

  const handleChangePage = (page) => setCurrentPage(page);


  const handleSearch = ({ currentTarget }) => {
    setSearch(currentTarget.value);
    setCurrentPage(1);
  };

  const filtered = customers.filter(
    (c) =>
      c.firstName.toLowerCase().includes(search.toLowerCase()) ||
      c.lastName.toLowerCase().includes(search.toLowerCase())
  );

  const paginated =
    filtered.length > 7 ? Pagination.getData(filtered, currentPage) : filtered;

  return (
    <>
      <table className="table table-hover">
      <Thead name="CLIENT" onChange={handleSearch} value={search}/>
        <tbody>
          {paginated.map((customer) => (
            <tr key={customer.id}>
              <td>{customer.id}</td>
              <td>
                <a href="#">
                  {customer.firstName} {customer.lastName}
                </a>
              </td>
              <td><a 
                    href={`mailto:${customer.email}`}
                    target="_blank" 
                    rel="noopener noreferrer">
                      {customer.email}
                  </a>
              </td>
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

      {filtered.length > 7 && (
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
