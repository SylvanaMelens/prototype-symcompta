import React, { useEffect, useState } from "react";
import Pagination from "../components/Pagination";
import axiosAPI from "../services/axiosAPI.js";
import TheadInvoice from "../components/TheadInvoice"
import moment from 'moment';

const InvoicesProviderPage = (props) => {
  const [invoices, setInvoices] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [search, setSearch] = useState("");

  const fetchInvoices = async () => {
    try {
      const data = await axiosAPI.findAll("invoice_providers");
      setInvoices(data);
    } catch (error) {
      console.log(error.response);
    }
  };

  useEffect(() => { fetchInvoices(), [] })

 const handleDelete = async (id) => {
    const originalInvoices = [...invoices];
    setInvoices(invoices.filter((invoice) => invoice.id !== id));

    try {
      await axiosAPI.delete(id, "invoice_providers");
    } catch (error) {
      setInvoices(originalInvoices);
      console.log(error.response);
    }
  };

  const handleChangePage = (page) => setCurrentPage(page);


  const handleSearch = ({ currentTarget }) => {
    setSearch(currentTarget.value);
    setCurrentPage(1);
  };

  const filtered = invoices.filter(
    (i) =>
      i.invoiceCustomerClient.firstName.toLowerCase().includes(search.toLowerCase()) ||
      i.invoiceCustomerClient.lastName.toLowerCase().includes(search.toLowerCase()) || 
      i.invoiceCustomerTotalAmount.toString().includes(search.toLowerCase()) || 
      i.invoiceCustomerNum.toString().includes(search.toLowerCase())
  );

  const paginated =
    filtered.length > 7 ? Pagination.getData(filtered, currentPage) : filtered;

  return (
    <>
    <h1>FACTURES CLIENTS</h1>
      <table className="table table-hover">
        <TheadInvoice name="CLIENT" onChange={handleSearch} value={search} />
        <tbody>
          {paginated.map((invoice) => (
            <tr key={invoice.id}>
              <td>{invoice.invoiceCustomerNum}</td>
              <td>{moment(invoice.invoiceCustomerSentAt).format("DD/MM/YYYY")}</td>
              <td>
                <a href="#">
                  {invoice.invoiceCustomerClient['firstName']} {invoice.invoiceCustomerClient['lastName']}
                </a>
              </td>
              <td>{invoice.invoiceCustomerTotalAmount.toLocaleString()} €</td>
              <td className="text-center">
                <button className="btn btn-sm btn-secondary">VOIR</button>
              </td>
              <td className="text-center">
                <button
                  onClick={() => handleDelete(invoice.id)}
                  // disabled={invoice.invoiceCustomers.length > 0}
                  className="btn btn-sm btn-gris"
                >
                  SUPPRIMER
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {invoices.length > 7 && (
        <Pagination
          pageName={invoices}
          currentPage={currentPage}
          handleChangePage={handleChangePage}
        />
      )}
    </>
  );
};

export default InvoicesProviderPage;
