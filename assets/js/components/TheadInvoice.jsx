import React from "react";

const TheadInvoice = (props) => {
  return (
    <>
      <thead className="thead">
        <tr>
          <th>NUMERO</th>
          <th>DATE</th>
          <th>{props.name}</th>
          <th>MONTANT</th>
          <th className="form-group" colSpan="2">
            <input
              type="text"
              placeholder="Rechercher..."
              className="form-control"
              onChange={props.onChange}
              value={props.value}
            />
          </th>
        </tr>
      </thead>
    </>
  );
};

export default TheadInvoice;
