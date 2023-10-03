import React, { useState } from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import { useParams } from "react-router-dom";

const RequestService = () => {
  const { productId } = useParams();
  const [formData, setFormData] = useState({
    name: "",
    model: "",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(formData);
  };
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="max-w-screen-xl mx-auto container-box">
        This Product Number {productId}
        <div className="flex justify-center w-full max-w-md mx-auto mb-4 text-3xl font-bold text-navColor">
          <h2>Request Service</h2>
        </div>
        <div className="w-full max-w-md p-4 mx-auto bg-white border border-gray-300 rounded-md">
          <form onSubmit={handleSubmit} className="w-full max-w-md">
            <div className="mb-4">
              <label
                htmlFor="pName"
                className="block mb-2 font-bold text-gray-700"
              >
                Name
              </label>
              <input
                type="text"
                id="pName"
                name="pName"
                value={formData.name}
                onChange={handleChange}
                className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                placeholder="Enter your product name"
              />
            </div>
            <div className="mb-4">
              <label
                htmlFor="mName"
                className="block mb-2 font-bold text-gray-700"
              >
                Name
              </label>
              <input
                type="text"
                id="mName"
                name="mName"
                value={formData.name}
                onChange={handleChange}
                className="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                placeholder="Enter your model name"
              />
            </div>

            <div className="flex items-center justify-center">
              <button
                type="submit"
                className="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
              >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default RequestService;
