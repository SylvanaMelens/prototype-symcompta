import React, { useEffect, useState } from "react";
import Pagination from "../components/Pagination";
import Thead from "../components/Thead";
import axiosAPI from "../services/axiosAPI.js";

const ProvidersPage = (props) => {
  const [providers, setProviders] = useState([]);
  const [currentPage, setCurrentPage] = useState(1);
  const [search, setSearch] = useState("");

  const fetchIntervenant = async () => {
    try {
      const data = await axiosAPI.findAll("providers");
      setProviders(data);
    } catch (error) {
      console.log(error.response);
    }
  };

  useEffect(() => { fetchIntervenant(), [] })

  const handleDelete = async (id) => {
    const originalProviders = [...providers];
    setProviders(providers.filter((provider) => provider.id !== id));

    try {
      await axiosAPI.delete(id, "providers");
    } catch (error) {
      setProviders(originalProviders);
      console.log(error.response);
    }
  };

  const handleChangePage = (page) => setCurrentPage(page);

  const handleSearch = ({ currentTarget }) => {
    setSearch(currentTarget.value);
    setCurrentPage(1);
  };

  const filtered = providers.filter(
    (p) =>
      p.providerFirstName.toLowerCase().includes(search.toLowerCase()) ||
      p.providerLastName.toLowerCase().includes(search.toLowerCase())
  );

  const paginated =
    filtered.length > 7 ? Pagination.getData(providers, currentPage) : filtered;

  return (
    <>
      <table className="table table-hover">
        <Thead name="FOURNISSEUR" onChange={handleSearch} value={search}/>
        <tbody>
          {paginated.map((provider) => (
            <tr key={provider.id}>
              <td>{provider.id}</td>
              <td>
                <a href="#">
                  {provider.providerFirstName} {provider.providerLastName}
                </a>
              </td>
              <td>{provider.providerEmail}</td>
              <td className="text-center">
                <button className="btn btn-sm btn-secondary">VOIR</button>
              </td>
              <td className="text-center">
                <button
                  onClick={() => handleDelete(provider.id)}
                  disabled={provider.invoiceProviders.length > 0}
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
          pageName={providers}
          currentPage={currentPage}
          handleChangePage={handleChangePage}
        />
      )}
    </>
  );
};

export default ProvidersPage;
