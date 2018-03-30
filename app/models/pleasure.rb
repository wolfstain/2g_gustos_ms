class Pleasure < ApplicationRecord
  belongs_to :subcategory
  validates :name, presence: true,
                   length: { minimum: 4, maximum: 50}
  validates :description, presence: true,
  length: { minimum: 4, maximum: 250 }
  validates :user_id, presence: true
  validates_associated :subcategory
  
end
