import React from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";

const ServiceStatus = () => {
  const products = [
    {
      id: 1,
      name: "Product 1",
      model: "Model A",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
    },
    {
      id: 2,
      name: "Product 2",
      model: "Model B",
      status: "Finished",
      partsUsed: "Part 123, Part 456",
      delayReason: "",
    },
    {
      id: 3,
      name: "Product 3",
      model: "Model C",
      status: "Late",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
    {
      id: 4,
      name: "Product 4",
      model: "Model D",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
    },
    {
      id: 5,
      name: "Product 5",
      model: "Model E",
      status: "Finished",
      partsUsed: "Part 123, Part 456",
      delayReason: "",
    },
    {
      id: 6,
      name: "Product 6",
      model: "Model F",
      status: "Late",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
    {
      id: 7,
      name: "Product 7",
      model: "Model G",
      status: "Late",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
    {
      id: 8,
      name: "Product 8",
      model: "Model H",
      status: "Late",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
    {
      id: 9,
      name: "Product 9",
      model: "Model I",
      status: "Pending",
      partsUsed: "Part 789",
      delayReason: "Supplier delay",
    },
    {
      id: 10,
      name: "Product 10",
      model: "Model J",
      status: "Finished",
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
          <div
            key={product.id}
            className="p-4 mb-4 transition duration-300 ease-in-out bg-white border-2 border-gray-300 rounded-md shadow-md hover:border-gray-400 hover:scale-103"
          >
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
