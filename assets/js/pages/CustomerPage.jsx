import React, { useState } from "react";
import Form from "../components/forms/Form";
import Field from "../components/forms/Field";
import { Link } from "react-router-dom";
import axios from "axios";

// props = name, label, value, onChange, type = "text", placeholder = "", error = ""

const CustomerPage = (props) => {
  const [customer, setCustomer] = useState({
    firstname: "",
    lastname: "",
    address: "",
    postcode: "",
    city: "",
    country: "",
    VatNumber: "NA",
    email: "",
    phone: "",
  });

  const [errors, setErrors] = useState({
    firstName: "",
    lastName: "",
    address: "",
    postCode: "",
    city: "",
    country: "",
    VATNumber: "",
    email: "",
    phone: "",
  });
  const [isRegistered, setIsRegistered] = useState(false);

  const handleChange = ({ currentTarget }) => {
    const { value, name } = currentTarget;
    setCustomer({ ...customer, [name]: value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      const response = await axios.post(
        "http://localhost:8000/api/customers",
        customer
      );
      setIsRegistered(true);
      setErrors({});

    } catch (error) {
      if (error.response.data.violations) {
        const apiErrors = {};
        error.response.data.violations.forEach((violation) => {
          apiErrors[violation.propertyPath] = violation.message;
        });
        setErrors(apiErrors);
      }
    }
  };

  return (
    <>
      <Form title="AJOUTER UN CLIENT" onSubmit={handleSubmit}>
        <Field
          name="firstname"
          label="Prénom ou sigle société"
          placeholder="Prénom ou sigle société"
          value={customer.firstname}
          onChange={handleChange}
          error={errors.firstName}
        />
        <Field
          name="lastname"
          label="Nom"
          placeholder="Nom personne ou société"
          value={customer.lastname}
          onChange={handleChange}
          error={errors.lastName}
        />
        <Field
          name="address"
          label="Adresse"
          placeholder="Adresse (rue et n°)"
          value={customer.address}
          onChange={handleChange}
          error={errors.address}
        />
        <Field
          name="postcode"
          label="Code postal"
          placeholder="Code postal"
          value={customer.postcode}
          onChange={handleChange}
          error={errors.postCode}
        />
        <Field
          name="city"
          label="Ville"
          placeholder="Ville"
          value={customer.city}
          onChange={handleChange}
          error={errors.city}
        />
        <Field
          name="country"
          label="Pays"
          placeholder="Pays"
          value={customer.country}
          onChange={handleChange}
          error={errors.country}
        />
        <Field
          name="VatNumber"
          label="Numéro de TVA"
          placeholder='BE0123456789 ou "NA" si non assujetti'
          value={customer.VatNumber}
          onChange={handleChange}
          error={errors.VATNumber}
        />
        <Field
          name="email"
          label="Email"
          placeholder="example@example.com"
          value={customer.email}
          onChange={handleChange}
          error={errors.email}
        />
        <Field
          name="phone"
          label="Numéro de téléphone"
          placeholder="Numéro de téléphone"
          value={customer.phone}
          onChange={handleChange}
          error={errors.phone}
        />
        {isRegistered && (
          <div className="btn btn-block mt-5">
            <p className="registred">Client enregistré !</p>
            <Link to="/clients">Retour à la liste des clients</Link>
          </div>
        )}
      </Form>
    </>
  );
};

export default CustomerPage;
