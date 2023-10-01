import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";

const ServiceStatus = () => {
  const products = [
    {
      name: "Product 1",
      model: "Model A",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
    },
    {
      name: "Product 2",
      model: "Model B",
      status: "Finished",
      partsUsed: "Part 123, Part 456",
      delayReason: "",
    },
    {
      name: "Product 3",
      model: "Model C",
      status: "Late",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
    {
      name: "Product 4",
      model: "Model D",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
    },
    {
      name: "Product 5",
      model: "Model E",
      status: "Finished",
      partsUsed: "Part 123, Part 456",
      delayReason: "",
    },
    {
      name: "Product 6",
      model: "Model F",
      status: "Late",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
    {
      name: "Product 7",
      model: "Model G",
      status: "Late",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
  ];
  products.sort((a, b) => {
    if (a.status === "Late" && b.status !== "Late") {
      return -1;
    }
    if (a.status !== "Late" && b.status === "Late") {
      return 1;
    }
    if (a.status === "Pending" && b.status === "Finished") {
      return -1;
    }
    if (a.status === "Finished" && b.status === "Pending") {
      return 1;
    }
    return 0;
  });
  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto text-gray-800 container-box">
        <h1 className="mb-4 text-2xl font-semibold">
          Service Maintenance Status
        </h1>
        {products.map((product) => (
          <div className="p-4 mb-4 transition duration-300 ease-in-out bg-gray-200 border-2 border-gray-300 rounded-md shadow-md hover:bg-gray-100 hover:scale-103">
            <h2 className="text-lg font-semibold">
              {product.name} - {product.model}
            </h2>
            <div className="mt-2">
              <p className="py-2">
                Status:
                <span
                  className={`px-3 py-1 rounded-sm ml-2 text-white ${
                    product.status === "Pending"
                      ? "bg-blue-600 "
                      : product.status === "Late"
                      ? "bg-red-500"
                      : product.status === "Finished"
                      ? "bg-green-600"
                      : ""
                  }`}
                >
                  {product.status}
                </span>
              </p>

              <p>Parts Used: {product.partsUsed}</p>
              {product.status === "Late" && (
                <p>Reason for Delay: {product.delayReason}</p>
              )}
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default ServiceStatus;
