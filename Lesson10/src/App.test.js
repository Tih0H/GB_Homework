// import { render, screen } from '@testing-library/react';
// import App from './App';

import { render } from "@testing-library/react";
import ListChats from "./components/ListChats";
import Home from "./pages/Home";
import profileReducer from "./store/profile/reduser";
import formatTimeStrings from "./utils/formatTime";
// import Enzyme, {shallow} from 'enzyme';
// import Adapter from 'enzyme-adapter-react-16';

// test('renders learn react link', () => {
//   render(<App />);
//   const linkElement = screen.getByText(/learn react/i);
//   expect(linkElement).toBeInTheDocument();
// });


describe('formatTime test', () =>{
  it('!!!returns None if no opening hours passed!!!', () =>{
    const expected = 'None';
    const received = formatTimeStrings([]);

    expect(received).toEqual(expected);
  });
});

describe('snapshot test', () => {
  it('Test component Home', () => {
    const utils = render(<Home />);
    expect(utils).toMatchSnapshot();
  });
});

// test('тест обьекта', () => {
//   const data = {один: 2};
//   expect(data).not.toEqual({один: 1});
// });

// test('map calls its argument with a non-null argument', () => {
//   const mock = profileReducer;
//   expect(mock).not.toBeCalled();
// });

test('Reduser profile test', () => {
  expect(profileReducer(undefined, {})).toEqual(
    {
      showName: false,
      name: 'Vladimir'
    }
  )
}); 

test('ListChats created test', () => {
  const utils = render(ListChats);
  expect(utils).toBeDefined();
}); 
