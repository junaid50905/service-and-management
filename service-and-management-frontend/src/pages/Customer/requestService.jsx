import React, { useState, useEffect } from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import { useParams } from "react-router-dom";
import { useSelector } from "react-redux";

const RequestService = () => {
  const { productId } = useParams();
  const userInfo = useSelector((state) => state.user);

  const [formData, setFormData] = useState({
    serialNumber: productId === "0" ? "" : productId,
    email: userInfo.email || "",
    branch: "N/A",
    problems: [],
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const addProblem = () => {
    setFormData({
      ...formData,
      problems: [...formData.problems, ""],
    });
  };

  const handleProblemChange = (index, value) => {
    const updatedProblems = [...formData.problems];
    updatedProblems[index] = value;
    setFormData({
      ...formData,
      problems: updatedProblems,
    });
  };

  const removeProblem = (index) => {
    const updatedProblems = formData.problems.filter((_, i) => i !== index);
    setFormData({
      ...formData,
      problems: updatedProblems,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(formData);
  };

  useEffect(() => {
    if (productId === "0") {
      setFormData({
        ...formData,
        serialNumber: "",
      });
    }
  }, [productId]);

  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="max-w-screen-xl mx-auto container-box">
        <div className="w-full max-w-md p-6 mx-auto bg-white rounded-md shadow-lg">
          <div className="flex justify-center w-full max-w-md mx-auto mb-4 text-3xl font-bold text-navColor">
            <h2>Request Service</h2>
          </div>
          <form className="mt-8 space-y-6" onSubmit={handleSubmit}>
            <div className="-space-y-px rounded-md shadow-sm">
              <div>
                <label htmlFor="serialNumber" className="sr-only">
                  Serial Number
                </label>
                <input
                  id="serialNumber"
                  name="serialNumber"
                  type="text"
                  autoComplete="serialNumber"
                  required
                  value={formData.serialNumber}
                  onChange={handleChange}
                  className="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Serial Number"
                />
              </div>
              <div>
                <label htmlFor="email" className="sr-only">
                  Email
                </label>
                <input
                  id="email"
                  name="email"
                  type="email"
                  autoComplete="email"
                  required
                  value={formData.email}
                  onChange={handleChange}
                  className="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                  placeholder="Email"
                />
              </div>
              <div>
                <label htmlFor="branch" className="sr-only">
                  Branch
                </label>
                <select
                  id="branch"
                  name="branch"
                  value={formData.branch}
                  onChange={handleChange}
                  className="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                >
                  <option value="N/A">N/A</option>
                  {/* Add more branch options here */}
                </select>
              </div>
              {formData.problems.map((problem, index) => (
                <div key={index} className="relative">
                  <label htmlFor={`problem${index}`} className="sr-only">
                    Problem {index + 1}
                  </label>
                  <input
                    id={`problem${index}`}
                    name={`problem${index}`}
                    type="text"
                    autoComplete="problem"
                    required
                    value={problem}
                    onChange={(e) => handleProblemChange(index, e.target.value)}
                    className="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                    placeholder={`Problem ${index + 1}`}
                  />
                  <button
                    type="button"
                    onClick={() => removeProblem(index)}
                    className="absolute px-2 text-red-500 bg-white right-2 top-2"
                  >
                    Remove
                  </button>
                </div>
              ))}
              <button
                type="button"
                onClick={addProblem}
                className="pt-2 text-indigo-500"
              >
                + Add Problem Details
              </button>
            </div>

            <div>
              <button
                type="submit"
                className="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Send Request
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default RequestService;
