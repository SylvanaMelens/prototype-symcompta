import React from "react";
import { Link } from "react-router-dom"

const Thead = (props) => {
  return (
    <>
      <thead className="thead">
        <tr>
          <th>ID</th>
          <th>{props.name}</th>
          <th>EMAIL</th>
          <th>
          <div className="d-flex justify-content-between align-items-center">
            <Link to={"/" + props.name.toLowerCase() + "s/new"} className="btn btn-sm btn-gris">Ajouter</Link>
          </div>
          </th>
          <th className="form-group">
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

export default Thead;
