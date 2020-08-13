import React from 'react'

const Pagination = ({pageName}) => {

    const itemsPerPage = 5
    const pagesCount = Math.ceil(pageName.length / itemsPerPage)
    const pages = []
  
    for(let i = 1; i <= pagesCount; i++) {
      pages.push(i)
      console.log("pagesCount", pagesCount)
    }
    return ( 
        <>
            <div> 
            <ul className="pagination pagination-md">
            <li className="page-item disabled">
                <a className="page-link" href="#">
                &laquo;
                </a>
            </li>
            {pages.map(p => 
                <li key={p} className="page-item active">
                    <a className="page-link" href="#">
                    {p}
                    </a>
                </li>
            )}
            <li className="page-item">
                <a className="page-link" href="#">
                &raquo;
                </a>
            </li>
            </ul>
        </div>
        </>
     );
}
 
export default Pagination;