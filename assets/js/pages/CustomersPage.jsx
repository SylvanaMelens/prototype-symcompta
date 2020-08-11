import React from "react";

const CustomersPage = (props) => {
  return (
    <>
      <table className="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>CLIENT</th>
            <th>EMAIL</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>18</td>
            <td>
              <a href="#">NOM TEST</a>
            </td>
            <td>example@example.com</td>
            <td className="text-center">
              <button className="btn btn-sm btn-secondary">VOIR</button>
            </td>
            <td className="text-center">
              <button className="btn btn-sm btn-gris">SUPPRIMER</button>
            </td>
          </tr>
        </tbody>
      </table>
    </>
  );
};

export default CustomersPage;
