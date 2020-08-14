import React from 'react'

const Table = ({ name, pageName, invoices, currentPage, paginated }) => {

    
    return ( 
        <table className="table table-hover">
            <thead className="thead">
            <tr>
                <th>ID</th>
                <th>{ name }</th>
                <th>EMAIL</th>
                <th className="form-group" colSpan="2">
                <input type="text" placeholder="Rechercher..." className="form-control"/>
                </th>
            </tr>
            </thead>
            <tbody>
            {paginated.map((item) => (
                <tr key={item.id}>
                <td>{item.id}</td>
                <td>
                    <a href="#">
                    {item.firstName} {item.lastName}
                    </a>
                </td>
                <td>{item.email}</td>
                <td className="text-center">
                    <button className="btn btn-sm btn-secondary">VOIR</button>
                </td>
                <td className="text-center">
                    <button
                    onClick={() => handleDelete(item.id)}
                    disabled={item.invoices.length > 0}
                    className="btn btn-sm btn-gris"
                    >
                    SUPPRIMER
                    </button>
                </td>
                </tr>
            ))}
            </tbody>
        </table>
    )

}
 
export default Table;