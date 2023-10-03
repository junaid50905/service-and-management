import React from "react";
import EngineerTopNav from "../../components/TopNavs/Engineer/engineerTopnav";

const EngineerLandingPage = () => {
  const tasks = [
    {
      id: 1,
      productName: "iPhone 13 Pro",
      customerName: "John Smith",
      customerAddress: "123 Main Street",
      customerLocation: "New York, NY",
    },
    {
      id: 2,
      productName: "Samsung Galaxy S21",
      customerName: "Alice Johnson",
      customerAddress: "456 Elm Avenue",
      customerLocation: "Los Angeles, CA",
    },
    {
      id: 3,
      productName: "MacBook Air",
      customerName: "David Wilson",
      customerAddress: "789 Oak Drive",
      customerLocation: "Chicago, IL",
    },
    {
      id: 4,
      productName: "Dell XPS 13",
      customerName: "Emily Davis",
      customerAddress: "101 Pine Road",
      customerLocation: "Houston, TX",
    },
    {
      id: 5,
      productName: "Sony PlayStation 5",
      customerName: "Sophia Brown",
      customerAddress: "222 Cedar Lane",
      customerLocation: "Miami, FL",
    },
    {
      id: 6,
      productName: "Nintendo Switch",
      customerName: "Michael Lee",
      customerAddress: "333 Birch Street",
      customerLocation: "San Francisco, CA",
    },
    {
      id: 7,
      productName: "Canon EOS Rebel T7i",
      customerName: "Olivia Miller",
      customerAddress: "444 Maple Avenue",
      customerLocation: "Seattle, WA",
    },
    {
      id: 8,
      productName: "LG OLED 4K TV",
      customerName: "William Taylor",
      customerAddress: "555 Pineapple Road",
      customerLocation: "Boston, MA",
    },
  ];
  return (
    <div>
      <EngineerTopNav />
      <div className="p-4 mx-auto container-box-full">
        <h1 className="mb-4 text-3xl font-semibold">Task Information</h1>
        <div className="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          {tasks.map((task, index) => (
            <div key={index} className="p-4 bg-white rounded-lg shadow-md">
              <h2 className="mb-2 text-xl font-semibold">{task.productName}</h2>
              <div className="mb-2">
                <span className="font-semibold">Customer Name:</span>{" "}
                {task.customerName}
              </div>
              <div className="mb-2">
                <span className="font-semibold">Customer Address:</span>{" "}
                {task.customerAddress}
              </div>
              <div>
                <span className="font-semibold">Customer Location:</span>{" "}
                {task.customerLocation}
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default EngineerLandingPage;
