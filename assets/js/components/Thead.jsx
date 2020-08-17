import React from 'react'

const Thead = ( props ) => {

    
    return ( 
        <>
            <thead className="thead">
            <tr>
                <th>ID</th>
                <th>{ props.name }</th>
                <th>EMAIL</th>
                <th className="form-group" colSpan="2">
                <input type="text" placeholder="Rechercher..." className="form-control"/>
                </th>
            </tr>
            </thead>

  

        </>
    )

}
 
export default Thead;