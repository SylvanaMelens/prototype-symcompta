import React from 'react'

const Pagination = ({pageName, currentPage, handleChangePage}) => {

    const itemsPerPage = 5
    const pagesCount = Math.ceil(pageName.length / itemsPerPage)
    const pages = []
      
    for(let i = 1; i <= pagesCount; i++) {
      pages.push(i)
      console.log("pagesCount", pagesCount)
    }

    // calculer la page de départ pour l'affichage
    const start = currentPage * itemsPerPage - itemsPerPage
    const paginatedCustomers = pageName.slice(start, start + itemsPerPage)

    return ( 
        <>
            <div> 
            <ul className="pagination pagination-md">
            <li className={"page-item " + (currentPage === 1 && "disabled")}>
                <button className="page-link" onClick={() => handleChangePage(currentPage -1)}>
                &laquo;
                </button>
            </li>
            {pages.map(p => 
                <li key={p} className={"page-item" + (currentPage === p && " active")}>
                    <button className="page-link" onClick={() => handleChangePage(p)}>
                    {p}
                    </button>
                </li>
            )}
            <li className={"page-item " + (currentPage === pagesCount && "disabled")}>
                <button className="page-link" onClick={() => handleChangePage(currentPage + 1)}>
                &raquo;
                </button>
            </li>
            </ul>
        </div>
        </>
     );
}

Pagination.getData = (items, currentPage, itemsPerPage = 7) => {
    const start = currentPage * itemsPerPage - itemsPerPage
    return items.slice(start, start + itemsPerPage)
}

export default Pagination;