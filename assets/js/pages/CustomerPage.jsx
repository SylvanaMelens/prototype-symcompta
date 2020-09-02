import React from "react";
import Form from "../components/forms/Form";
import Field from "../components/forms/Field";

// props = name, label, value, onChange, type = "text", placeholder = "", error = ""

const CustomerPage = (props) => {
  return (
    <>
      <Form title="AJOUTER UN CLIENT">
        <Field
          name="firstname"
          label="Prénom ou sigle société"
          placeholder="Prénom ou sigle société"
          value=""
        />
        <Field
          name="lastname"
          label="Nom"
          placeholder="Nom personne ou société"
          value=""
        />
        <Field
          name="address"
          label="Adresse"
          placeholder="Adresse (rue et n°)"
          value=""
        />
        <Field
          name="postcode"
          label="Code postal"
          placeholder="Code postal"
          value=""
        />
        <Field name="city" label="Ville" placeholder="Ville" value="" />
        <Field name="country" label="Pays" placeholder="Pays" value="" />
        <Field
          name="VATNumber"
          label="Numéro de TVA"
          placeholder='BE0123456789 ou "NA" si non assujetti'
          value=""
        />
        <Field
          name="email"
          label="Email"
          placeholder="example@example.com"
          value=""
        />
        <Field
          name="phone"
          label="Numéro de téléphone"
          placeholder="Numéro de téléphone"
          value=""
        />
      </Form>
    </>
  );
};

export default CustomerPage;
