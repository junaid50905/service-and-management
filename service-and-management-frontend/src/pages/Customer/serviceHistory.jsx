import React, { useState, useEffect } from "react";
import CustomerSideNav from "../../components/SideNavs/Customer/customerSideNav";
import TopNav from "../../components/TopNavs/Customer/topnav";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faMagnifyingGlass } from "@fortawesome/free-solid-svg-icons";

const ServiceHistory = () => {
  const [searchQuery, setSearchQuery] = useState("");
  const [filteredProducts, setFilteredProducts] = useState([]);
  const [finishedProducts, setFinishedProducts] = useState([]);

  const handleSearch = (event) => {
    const query = event.target.value;
    setSearchQuery(query);

    // Filter products based on the search query
    const filtered = finishedProducts.filter(
      (product) =>
        product.name.toLowerCase().includes(query.toLowerCase()) ||
        product.serialNumber.toLowerCase().includes(query.toLowerCase()) ||
        product.model.toLowerCase().includes(query.toLowerCase())
    );

    setFilteredProducts(filtered);
  };

  const products = [
    {
      id: 1,
      serialNumber: "SN12345",
      name: "Laptop",
      model: "X1",
      manufacturer: "TechCorp",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Scheduled Maintenance",
      maintenanceNotes: "Routine cleaning and software update.",
      maintenancePersonnel: "Alice Johnson",
      maintenancePersonnelPhoto: "alice.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
    },
    {
      id: 2,
      serialNumber: "SN67890",
      name: "Smartphone",
      model: "S2",
      manufacturer: "MobileTech",
      status: "Finished",
      partsUsed: "Screen replacement, battery upgrade",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Repaired screen and upgraded battery.",
      maintenancePersonnel: "Bob Smith",
      maintenancePersonnelPhoto: "bob.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "SYLHET Branch",
      startDate: "2023-06-30",
      endDate: "2023-08-21",
    },
    {
      id: 3,
      serialNumber: "SN54321",
      name: "Refrigerator",
      model: "FridgeMaster",
      manufacturer: "CoolTech",
      status: "Late",
      partsUsed: "Compressor replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced compressor due to failure.",
      maintenancePersonnel: "Elena Rodriguez",
      maintenancePersonnelPhoto: "elena.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
    },
    {
      id: 4,
      serialNumber: "SN98765",
      name: "Digital Camera",
      model: "SnapShot",
      manufacturer: "PhotoGear",
      status: "Finished",
      partsUsed: "Lens cleaning, firmware update",
      delayReason: "",
      maintenanceType: "Routine Maintenance",
      maintenanceNotes: "Cleaned the lens and updated firmware.",
      maintenancePersonnel: "David Brown",
      maintenancePersonnelPhoto: "david.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
      endDate: "2023-08-21",
    },
    {
      id: 5,
      serialNumber: "SN24680",
      name: "Coffee Maker",
      model: "BrewMaster",
      manufacturer: "CafeTech",
      status: "Late",
      partsUsed: "Heating element replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced heating element due to malfunction.",
      maintenancePersonnel: "Grace Taylor",
      maintenancePersonnelPhoto: "grace.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "SYLHET Branch",
      startDate: "2023-06-30",
    },
    {
      id: 6,
      serialNumber: "SN13579",
      name: "Television",
      model: "UltraView",
      manufacturer: "VisionTech",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Installation",
      maintenanceNotes: "Installed and configured the TV set.",
      maintenancePersonnel: "James Wilson",
      maintenancePersonnelPhoto: "james.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
    },
    {
      id: 7,
      serialNumber: "SN11223",
      name: "Washing Machine",
      model: "CleanWash",
      manufacturer: "LaundryTech",
      status: "Late",
      partsUsed: "Pump replacement",
      delayReason: "Supplier delay",
      maintenanceType: "Emergency Repair",
      maintenanceNotes: "Replaced the pump due to a malfunction.",
      maintenancePersonnel: "Olivia Martinez",
      maintenancePersonnelPhoto: "olivia.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
    },
    {
      id: 8,
      serialNumber: "SN87654",
      name: "Microwave Oven",
      model: "HeatWave",
      manufacturer: "KitchenTech",
      status: "Finished",
      partsUsed: "Magnetron replacement, door latch repair",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Replaced magnetron and repaired the door latch.",
      maintenancePersonnel: "William Lee",
      maintenancePersonnelPhoto: "william.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
      endDate: "2023-08-21",
    },
    {
      id: 9,
      serialNumber: "SN45678",
      name: "Air Conditioner",
      model: "CoolBreeze",
      manufacturer: "ClimateTech",
      status: "Pending",
      partsUsed: "None",
      delayReason: "",
      maintenanceType: "Scheduled Maintenance",
      maintenanceNotes: "Cleaned filters and checked refrigerant levels.",
      maintenancePersonnel: "Sophia Chen",
      maintenancePersonnelPhoto: "sophia.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
    },
    {
      id: 10,
      serialNumber: "SN10101",
      name: "Tablet",
      model: "TabPro",
      manufacturer: "TechGadget",
      status: "Finished",
      partsUsed: "Battery replacement, screen repair",
      delayReason: "",
      maintenanceType: "Repair",
      maintenanceNotes: "Replaced the battery and repaired the screen.",
      maintenancePersonnel: "Michael Adams",
      maintenancePersonnelPhoto: "michael.jpg",
      maintenancePersonnelCont: "01743217209",
      branchName: "DHAKA Branch",
      startDate: "2023-06-30",
      endDate: "2023-08-21",
    },
  ];

  useEffect(() => {
    const finished = products.filter(
      (product) => product.status === "Finished"
    );
    setFinishedProducts(finished);
    setFilteredProducts(finished);
  }, []);

  return (
    <div>
      <TopNav />
      <CustomerSideNav />
      <div className="mx-auto container-box font-roboto">
        <div className="flex items-center mt-4">
          <FontAwesomeIcon icon={faMagnifyingGlass} className="absolute ml-2" />
          <input
            type="text"
            placeholder="Search products (Name/Model/SN)"
            className="w-full p-2 pl-8 border border-gray-300 rounded-md outline-none"
            value={searchQuery}
            onChange={handleSearch}
          />
        </div>
        <div className="px-3 py-0 mt-4">
          <h1 className="font-bold text-center text-gray-800 title-style">
            Maintenance History
          </h1>
        </div>
        {filteredProducts.length === 0 ? (
          <h1 className="mt-4 text-2xl text-center text-gray-800">
            No Maintenance History Available
          </h1>
        ) : (
          <table className="w-full mt-4 mb-5 rounded-md shadow-md table-fixed">
            <thead>
              <tr className="text-sm leading-normal uppercase bg-white">
                <th className="px-1 py-3 text-center" style={{ width: "5%" }}>
                  SL
                </th>
                <th className="px-2 py-3 text-center break-words">Name</th>
                <th className="px-2 py-3 text-center break-words ">Model</th>
                <th className="px-2 py-3 text-center break-words">
                  Serial Number
                </th>
                <th className="px-2 py-3 text-center break-words">Branch</th>
                <th className="px-2 py-3 text-center break-words">
                  Parts Used
                </th>
                <th className="px-2 py-3 text-center break-words">Type</th>
                <th className="px-2 py-3 text-center break-words">Engineer</th>
                <th className="px-2 py-3 text-center break-words">
                  Started On
                </th>
                <th className="px-2 py-3 text-center break-words">
                  Finished On
                </th>
              </tr>
            </thead>
            <tbody className="text-sm font-light text-gray-900">
              {filteredProducts.map((product, index) => (
                <tr
                  key={product.id}
                  className="transition duration-300 ease-in-out"
                >
                  <td
                    className="px-1 py-3 text-center break-words "
                    style={{ width: "5%" }}
                  >
                    {index + 1}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.name}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.model}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.serialNumber}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.branchName}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.partsUsed}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.maintenanceType}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.maintenancePersonnel}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.startDate}
                  </td>
                  <td className="px-2 py-3 text-center break-words ">
                    {product.endDate}
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        )}
      </div>
    </div>
  );
};

export default ServiceHistory;
