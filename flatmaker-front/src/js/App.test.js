import { render, screen } from '@testing-library/react';
import OnBoard from './OnBoard';

test('renders learn react link', () => {
  render(<OnBoard />);
  const linkElement = screen.getByText(/learn react/i);
  expect(linkElement).toBeInTheDocument();
});
