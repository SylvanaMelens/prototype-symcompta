import React from "react";

const Form = (props, { onSubmit, title }) => {
  return (
    <>
      <form
        onSubmit={props.onSubmit}
        className="center-block form-group col-sm-6"
        id="form"
        action="post"
      >
        <h1 id="connexion" className="text-center form-group col-sm-2 pb2">
          {props.title}
        </h1>
        {props.children}
        <div id="div-btn-connexion" className="form-group text-center">
          <button type="submit" className="btn btn-secondary col-sm-6">
            {props.title}
          </button>
        </div>
      </form>
    </>
  );
};

export default Form;
